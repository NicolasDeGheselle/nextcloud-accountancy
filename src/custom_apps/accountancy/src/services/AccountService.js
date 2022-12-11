import axios from '@nextcloud/axios'
import { generateUrl } from '@nextcloud/router'
import { Transaction } from './TransactionService';

export class Account {
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
            new Transaction(),
            new Transaction(),
            new Transaction(),
            new Transaction()
        ];
    }
}

export default class AccountService {

    url(url) {
		url = `/apps/accountancy/api/v1/accounts${url}`
		return generateUrl(url)
	}

    GetRoot() {
        return new Account(null, [
            new Account("Test-1"),
            new Account("Test-2")
        ]);
    }

    GetById(id) {
        axios.get(this.url('')).then((response) => {
            console.debug(response);
        });


        let test = new Account("NAME_" + id);
        test.parents = [{
            id: 'bloupy',
            name: "Bloupy !"
        }];

        return test;
    }
}