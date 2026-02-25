# FourFront Money Tracker API Documentation

Welcome to the FourFront Money Tracker API. This API allows you to manage users, their wallets, and their financial transactions.

## Base URL
`http://127.0.0.1:8000/api`

---

## 1. User Management

### Create a User
Create a new user account with a name and unique email address.

- **URL:** `/users`
- **Method:** `POST`
- **Request Body:**
  ```json
  {
    "name": "John Doe",
    "email": "john@example.com"
  }
  ```
- **Success Response (201 Created):**
  ```json
  {
    "message": "User created successfully.",
    "data": {
      "id": 1,
      "name": "John Doe",
      "email": "john@example.com",
      "updated_at": "2024-02-25T18:00:00.000000Z",
      "created_at": "2024-02-25T18:00:00.000000Z"
    }
  }
  ```

### Get User Profile
Fetch a user's details including all their wallets and a computed total balance across all wallets.

- **URL:** `/users/{id}`
- **Method:** `GET`
- **Success Response (200 OK):**
  ```json
  {
    "data": {
      "id": 1,
      "name": "John Doe",
      "email": "john@example.com",
      "created_at": "2024-02-25T18:00:00.000000Z",
      "updated_at": "2024-02-25T18:00:00.000000Z",
      "wallets": [
        {
          "id": 1,
          "name": "Personal Savings",
          "balance": 500.00,
          "created_at": "2024-02-25T18:05:00.000000Z",
          "updated_at": "2024-02-25T18:05:00.000000Z"
        }
      ],
      "total_balance": 500.00
    }
  }
  ```

---

## 2. Wallet Management

### Create a Wallet
Create a new wallet for a specific user.

- **URL:** `/users/{userId}/wallets`
- **Method:** `POST`
- **Request Body:**
  ```json
  {
    "name": "Business Account"
  }
  ```
- **Success Response (201 Created):**
  ```json
  {
    "message": "Wallet created successfully.",
    "data": {
      "id": 2,
      "user_id": 1,
      "name": "Business Account",
      "updated_at": "2024-02-25T18:10:00.000000Z",
      "created_at": "2024-02-25T18:10:00.000000Z"
    }
  }
  ```

### Get Wallet Details
Fetch a specific wallet's current balance and its full transaction history.

- **URL:** `/wallets/{walletId}`
- **Method:** `GET`
- **Success Response (200 OK):**
  ```json
  {
    "data": {
      "id": 1,
      "user_id": 1,
      "name": "Personal Savings",
      "balance": 500.00,
      "created_at": "2024-02-25T18:05:00.000000Z",
      "updated_at": "2024-02-25T18:05:00.000000Z",
      "transactions": [
        {
          "id": 1,
          "wallet_id": 1,
          "type": "income",
          "amount": 500.00,
          "description": "Monthly Salary",
          "created_at": "2024-02-25T18:06:00.000000Z",
          "updated_at": "2024-02-25T18:06:00.000000Z"
        }
      ]
    }
  }
  ```

---

## 3. Transaction Management

### Record a Transaction
Record either an `income` or an `expense` against a wallet.

- **URL:** `/wallets/{walletId}/transactions`
- **Method:** `POST`
- **Request Body:**
  ```json
  {
    "type": "income",
    "amount": 1500.50,
    "description": "Project payment"
  }
  ```
- **Input Validation:**
  - `type`: Must be `income` or `expense`.
  - `amount`: Must be a positive number greater than 0.
  - `description`: Optional free-text (max 1000 characters).

- **Success Response (201 Created):**
  ```json
  {
    "message": "Transaction recorded successfully.",
    "data": {
      "id": 2,
      "wallet_id": 1,
      "type": "income",
      "amount": 1500.50,
      "description": "Project payment",
      "updated_at": "2024-02-25T18:15:00.000000Z",
      "created_at": "2024-02-25T18:15:00.000000Z"
    }
  }
  ```

---

## Technical Notes

- **Dynamic Balances:** Wallet balances and User total balances are calculated in real-time by subtracting the sum of `expense` transactions from the sum of `income` transactions.
- **Data Integrity:** All numeric values are handled as high-precision decimals to ensure financial accuracy.
- **Validation:** If invalid data is sent (e.g., negative amount, duplicate email), the API returns a `422 Unprocessable Entity` response with specific error messages.
