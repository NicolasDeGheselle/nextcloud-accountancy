class Account {
    constructor(name, subAccounts) {
        this.parents = [];
        if (name)
        {
            this.id = "ID-"+name;
            this.name = name;
        }

        this.subAccounts = subAccounts;
        this.description = "Root account";
        this.type = "bank";
        this.balance = 500.155050;
        this.transactions = [
            {
                name: "test",
                description: "edead dslfk mqfdlk mldqskf",
                value: 50.50,
                date: "01/05/2022"
            },
            {
                name: "test",
                description: "edead dslfk mqfdlk mldqskf",
                value: 50.50,
                date: "01/05/2022"
            },
            {
                name: "test",
                description: "edead dslfk mqfdlk mldqskf",
                value: 50.50,
                date: "01/05/2022"
            }
        ];
    }

    hasSubs() {
        return this.subAccounts && this.subAccounts.length;
    }
}

export default class AccountService {
    static GetRoot() {
        return new Account(null, [
            new Account("Test-1"),
            new Account("Test-2")
        ]);
    }

    static GetById(id) {
        let test = new Account("NAME_" + id);
        test.parents = [{
            id: 'bloupy',
            name: "Bloupy !"
        }];

        return test;
    }
}
  