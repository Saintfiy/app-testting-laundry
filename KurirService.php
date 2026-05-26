<?php
class KurirService {
    private $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    public function updateStatus($userId, $status) {
        $stmt = $this->pdo->prepare("UPDATE users SET kurir_status = ? WHERE id = ?");
        return $stmt->execute([$status, $userId]);
    }
}
?>
