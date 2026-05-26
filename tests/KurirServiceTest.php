<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../KurirService.php';

class KurirServiceTest extends TestCase {
    public function testUpdateStatus() {
        $stmtMock = $this->createMock(PDOStatement::class);
        $stmtMock->expects($this->once())
                 ->method('execute')
                 ->with(['aktif', 1])
                 ->willReturn(true);

        $pdoMock = $this->createMock(PDO::class);
        $pdoMock->expects($this->once())
                ->method('prepare')
                ->with('UPDATE users SET kurir_status = ? WHERE id = ?')
                ->willReturn($stmtMock);


        $service = new KurirService($pdoMock);
        $result = $service->updateStatus(1, 'aktif');
        $this->assertTrue($result);
    }
}
?>
