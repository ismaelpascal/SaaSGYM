<?php include __DIR__ . '/../layouts/header.php';?>

<div class="flex h-screen overflow-hidden">

    <?php include __DIR__ . '/../components/sideBar.php'; ?>

    <main class="flex-grow flex flex-col">

        <div class="flex flex-grow overflow-hidden">
            
            <div class="w-1/4 h-full flex flex-col border-r border-gray-200">
                <div class="flex-shrink-0 p-4 bg-white border-b border-gray-200">
                    <div class="flex items-center space-x-2">
                        <div class="flex-grow">
                            <?php include __DIR__ . '/../components/searchBar.php'; ?>
                        </div>
                    </div>
                </div>
                <div class="flex-grow overflow-y-auto">
                    <?php include __DIR__ . '/../components/clientList.php'; ?>
                </div>
            </div>

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