module Inspector {
    export class Console {
        container: string;
        constructor(container: string) {
            this.container = container;
        }

        write(message: string) {
            $(this.container).append(message);
        }

        clear() {
            $(this.container).text();
        }
    }
}
