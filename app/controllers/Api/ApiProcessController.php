<?php


class ApiProcessController extends BaseController {

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getIndex() {
        return Redirect::action('HomeController@getIndex');
    }

    public function postIndex() {
        $input = Input::all();

        // Verify the user inputted stuff.
        if(!isset($input['language'])  || !isset($input['code'])) {
            return Response::json(array('status' => false, 'errors' => array('Nothing submitted.')));
        }

        // Check if language is supported, if so allow through
        $language = Language::where('short', '=', $input['language'])->first();
        if($language) {
            $code = $input['code'];
            $owner = $input['owner'];

            $response = call_user_func_array(array('ApiProcessController', $language->short), array($language, $code, $owner));

            return Response::json($response);
        } else {

            return '404';
        }
    }

    private function php($language, $code, $owner, $options = false) {
        // Construct the post
        $data = array('code' => $code, 'language' => $language->short, 'owner' => $owner);

        // Send the data and get the response.
        $response = Requests::post($language->endpoint, array(), $data);
        if(!$response->success) {
            return array('status' => false, 'message' => "Script timed out. 30 seconds is max execution time.");
        }
        $response = json_decode($response->body, true);

        return $response;
    }
}
