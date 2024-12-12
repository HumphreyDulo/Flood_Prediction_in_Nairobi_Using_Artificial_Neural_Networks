import './bootstrap'; // Keep this if you need it for dependencies
import { createApp } from 'vue';
import Map from './Map.vue'; // Import the Map component

// Create a fresh Vue application instance
const app = createApp(Map); // Use Map as the main component

// Register the Map component globally if needed
// If you want to use it in other components, you can do so like this:
// app.component('Map', Map);

app.mount('#app'); // Attach the application instance to the HTML element with id="app"
