import axios from '@nextcloud/axios'
import { generateUrl } from '@nextcloud/router'
import { Transaction } from './TransactionService';

export class Account {
    constructor() {
        this.id = "";
        this.name = "";
        this.description = "";
        this.type = "";
        this.balance = 0;

        this.transactions = [];
        this.parents = [];
        this.subAccounts = [];
    }
}

export default class AccountService {

    url(url) {
		url = `/apps/accountancy/api/v1/accounts${url}`
		return generateUrl(url)
	}

    GetRoot() {
        let account = new Account();
        let sub = new Account();
        sub.id = "TEST-1";
        
        account.subAccounts = [sub];
        return account;
    }

    GetById(id) {
        axios.get(this.url('')).then((response) => {
            console.debug(response);
        });

        let test = new Account();
        test.id = id;
        test.parents = [{
            id: 'bloupy',
            name: "Bloupy !"
        }];

        return test;
    }
}