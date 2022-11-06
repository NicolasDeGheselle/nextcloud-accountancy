export default class AccountService {

    static All()
    {
        return [
            {
                id: "0513513-4",
                name: "Test",
                description: "n° test",
                type: "bank",
                balance: 50151.155050
            },
            {
                id: "0513513-3",
                name: "Test 2",
                description: "n° test",
                type: "bank",
                balance: -150.50,
                subAccounts: [
                    "0513513-1",
                    "0513513-2"
                ]
            }
        ];
    }
}
  