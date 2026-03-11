import { Datepicker } from 'vanillajs-datepicker';
import 'fslightbox';
import 'vanillajs-datepicker/css/datepicker-bulma.css';
import './libs/jquery.min'
import './libs/jquery.izoomify';
import './init/slides';
import './init/scrollspy';
import './init/zoom';
import './stores/store';
import './stores/drawer-store';
import './bootstrap';

if (document.getElementById('purchase-date-picker')) {
    const purchaseDatePicker = document.querySelectorAll('#purchase-date-picker');

    purchaseDatePicker.forEach((picker) => {
        const datepicker = new Datepicker(picker, {
            todayHighlight: true,
            maxDate: new Date(),
        })

        picker.addEventListener('changeDate', () => {
            const dateValue = datepicker.getDate();
            const year = dateValue.getFullYear();
            const month = String(dateValue.getMonth() + 1).padStart(2, '0');
            const day = String(dateValue.getDate()).padStart(2, '0');
            const formattedDate = `${year}-${month}-${day}`;

            Livewire.dispatch('purchase-date-selected', { date: formattedDate });
            Alpine.store('guaranteePurchaseDateDrawer').closeDrawer();
        })
    })
}
