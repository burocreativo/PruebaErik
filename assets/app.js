/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
//import './styles/app.css';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';

//console.log('Hello Webpack Encore! Edit me in assets/app.js');

import Vue from 'vue'
import App from './App.vue'
import MyVuetable from './MyVuetable.vue'
import CustomActions from './CustomActions.vue'
import DetailRow from './DetailRow.vue'
import FilterBar from './FilterBar.vue'
import UsersTable from './UsersTable.vue'
import LoadSpinner from './LoadSpinner.vue'
import AddUserButton from './AddUserButton.vue'

new Vue({
    el: "#app",
    components: {App}
})

new Vue({
    el: "#my-vuetable",
    components: {MyVuetable}
})

new Vue({
    el: "#custom-actions",
    components: {CustomActions}
})

new Vue({
    el: "#my-detail-row",
    components: {DetailRow}
})

new Vue({
    el: "#filter-bar",
    components: {FilterBar}
})

new Vue({
    el: "#users-table",
    components: {UsersTable}
})

new Vue({
    el: "#load-spinner",
    components: {LoadSpinner}
})

new Vue({
    el: "#add-user-button",
    components: {AddUserButton}
})