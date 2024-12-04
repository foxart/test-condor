<?php
require_once 'system/database.php';
require_once 'system/pinkManApi.php';
require_once 'dto/transactionDto.php';
require_once 'models/userModel.php';
/**
 *
 */
class UserTransactionList
{
    private Database $database;
    private string $tableStyle = 'border-collapse: collapse; width: 100%;';
    private string $cellStyle = 'border: solid 1px black; border-collapse: collapse;';

    public function __construct()
    {
        $this->database = Database::getConnection();
    }

    public function getTransactions(int $userId): void
    {
        $userModel = new UserModel();
        $user = $userModel->getUserById($userId);
        $apiClient = new PinkManApi();
        $transactionList = $apiClient->fetchTransactions();
        $transactions = array_map( function($transaction) use ($user) {
            return new TransactionDto(...$transaction);
        }, array_filter($transactionList, function($transaction) use ($user) {
            return $transaction['user_id'] === $user->getId();
        }));

        echo "<table style='$this->tableStyle'>";
        echo '<tr>';
        echo '<th>ID</th><th>Type</th><th>User ID</th><th>Date</th><th>Amount</th><th>Currency</th><th>Processed</th><th>Details</th>';
        echo '</tr>';
        foreach ($transactions as $transaction) {
            echo '<tr>';
            echo "<td style='$this->cellStyle'>" . $transaction->getId() . '</td>';
            echo "<td style='$this->cellStyle'>" . $transaction->getType() . '</td>';
            echo "<td style='$this->cellStyle'>" . $transaction->getUserId() . '</td>';
            echo "<td style='$this->cellStyle'>" . $transaction->getDate() . '</td>';
            echo "<td style='$this->cellStyle'>" . $transaction->getAmount() . '</td>';
            echo "<td style='$this->cellStyle'>" . $transaction->getCurrency() . '</td>';
            echo "<td style='$this->cellStyle'>" . ($transaction->isProcessed() ? 'Yes' : 'No') . '</td>';
            echo "<td style='$this->cellStyle'>" . $transaction->getDetails() . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
}
