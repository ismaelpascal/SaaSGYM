<?php 
$pageTitle = 'Gestión de Clientes'; 
include __DIR__ . '/../layouts/header.php'; 
?>

<div class="flex h-screen overflow-hidden">

    <?php include __DIR__ . '/../components/sideBar.php'; ?>

    <main class="flex-grow flex flex-col">

        <div class="flex flex-grow overflow-hidden">
            
            <?php include __DIR__ . '/../components/clients/clientList.php'; ?>

            <div class="w-3/4 p-6 flex flex-col space-y-6 overflow-y-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php include __DIR__ . '/../components/clients/clientInfo.php'; ?>
                    <?php include __DIR__ . '/../components/clients/clientNotes.php'; ?>
                </div>
                <?php include __DIR__ . '/../components/clients/attendanceHistory.php'; ?>
                <?php include __DIR__ . '/../components/clients/paymentHistory.php'; ?>
            </div>

        </div>
    </main>
</div>

<?php include __DIR__ . '/../components/clients/addClient.php'; ?>
<?php include __DIR__ . '/../components/clients/addNotes.php'; ?>
<?php include __DIR__ . '/../components/clients/addPayment.php'; ?>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
