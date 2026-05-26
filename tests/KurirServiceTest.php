<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../KurirService.php';

class KurirServiceTest extends TestCase {
    public function testUpdateStatus() {
        // Membuat Test Double (Mock) untuk PDOStatement
        $stmtMock = $this->createMock(PDOStatement::class);
        $stmtMock->expects($this->once())
                 ->method('execute')
                 ->with(['aktif', 1])
                 ->willReturn(true);

        // Membuat Test Double (Mock) untuk PDO
        $pdoMock = $this->createMock(PDO::class);
        $pdoMock->expects($this->once())
                ->method('prepare')
                ->with('UPDATE users SET kurir_status = ? WHERE id = ?')
                ->willReturn($stmtMock);

        // Menggunakan Mock dalam service (dependency injection)
        $service = new KurirService($pdoMock);
        $result = $service->updateStatus(1, 'aktif');

        // Memastikan hasil eksekusi sesuai ekspektasi
        $this->assertTrue($result);
    }
}
?>
