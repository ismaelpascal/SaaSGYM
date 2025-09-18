<!-- control de planes / membresias 
 distintos tipos de planes, familiar, mensual, diario, semanal, etc.
 renovacion automatica-->

<?php include __DIR__ . '/../layouts/header.php';?>

<div class="flex h-screen overflow-hidden">

    <?php include __DIR__ . '/../components/sideBar.php'; ?>

    <main class="flex-grow flex flex-col">

        <div class="flex flex-grow overflow-hidden">
            
            <?php include __DIR__ . '/../components/clientList.php'; ?>

            <div class="w-3/4 p-6 flex flex-col space-y-6 overflow-y-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php include __DIR__ . '/../components/plans/pauseMembership.php'; ?>
                    <?php include __DIR__ . '/../components/plans/renovations.php'; ?>
                </div>
                <?php include __DIR__ . '/../components/plans/availablePlans.php'; ?>
            </div>

        </div>
    </main>
</div>

    <?php include __DIR__ . '/../components/plans/addPlans.php'; ?>

<?php include __DIR__ . '/../layouts/footer.php';?>