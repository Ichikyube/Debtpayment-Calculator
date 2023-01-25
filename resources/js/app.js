import './bootstrap';
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import mask from '@alpinejs/mask';
import money from 'alpinejs-money';
import swal from 'sweetalert';
window.Alpine = Alpine;
Alpine.plugin(focus);
Alpine.plugin(mask)
Alpine.plugin(money);
Alpine.start();
