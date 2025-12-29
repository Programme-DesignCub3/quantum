import { Datepicker } from 'vanillajs-datepicker';
import 'vanillajs-datepicker/css/datepicker-bulma.css';

import './init/slides';
import './init/scrollspy';
import './stores/store';
import './stores/drawer-store';
import './bootstrap';

if (document.getElementById('purchase-date-picker')) {
    const purchaseDatePicker = document.getElementById('purchase-date-picker');
    const datepicker = new Datepicker(purchaseDatePicker, {
        todayHighlight: true,
        maxDate: new Date(),
    });

    purchaseDatePicker.addEventListener('changeDate', () => {
        const dateValue = datepicker.getDate();
        const year = dateValue.getFullYear();
        const month = String(dateValue.getMonth() + 1).padStart(2, '0');
        const day = String(dateValue.getDate()).padStart(2, '0');
        const formattedDate = `${year}-${month}-${day}`;

        Livewire.dispatch('purchase-date-selected', { date: formattedDate });
        Alpine.store('guaranteePurchaseDateDrawer').closeDrawer();
    });
}
