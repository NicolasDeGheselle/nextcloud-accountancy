export class Transaction
{
    constructor() {
        this.name = "test";
        this.description = "edead dslfk mqfdlk mldqskf";
        this.value = 50.50;
        this.date = "01/05/2022";

        this.selected = undefined;
    }
}

 export default class TransactionService {

    static All()
    {
        return [
            new Transaction(),
            new Transaction(),
            new Transaction(),
            new Transaction()
        ];
    }
}