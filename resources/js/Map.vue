<template>
    <div id="app">
        <h1>My Map Application</h1>
        <!-- Only include router-view if you're using Vue Router -->
        <router-view></router-view> 
        <!-- Include the Map component -->
        <Map /> 
    </div>
</template>

<script>
import Map from './Map.vue'; // Ensure to import the Map component correctly

export default {
    name: 'App',
    components: {
        Map // Registering the Map component locally
    }
}
</script>

<style>
/* Add any global styles here */
#app {
    height: 80%; /* Make the app take full height */
}
</style>
