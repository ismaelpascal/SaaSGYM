import initClientList from './components/clientList.js';
import initClientSearch from './components/searchBar.js';

import initAddClients from './components/clients/addClients.js';
import initClientForm from './components/clients/clientForm.js';
import initAddNotes from './components/clients/addNotes.js';
import initClientsPage from './components/clients/clientsPage.js';
import initClientNotes from './components/clients/clientNotes.js';
import initClientNoteForm from './components/clients/clientNoteForm.js';
import initClientPayments from './components/clients/clientPayments.js';
import initAddPayment from './components/clients/addPayment.js';

import initAddPlans from './components/plans/addPlans.js';
import initAvailablePlans from './components/plans/availablePlans.js';
import initPauseMembership from './components/plans/pauseMembership.js';

import initProductCatalog from './components/sales/productCatalog.js';
import initInventory from './components/sales/inventory.js';
import initSalesStats from './components/sales.js';
import initPendingSales from './components/sales/pendingSales.js';

initSalesStats();

initClientList();
initClientSearch();

initAddNotes();
initClientForm();
initAddClients();
initClientsPage();
initClientNotes();
initClientNoteForm();
initClientPayments();
initAddPayment();

initAddPlans();
initAvailablePlans();
initPauseMembership();

initProductCatalog();
initInventory();
initSalesStats();
initPendingSales();
