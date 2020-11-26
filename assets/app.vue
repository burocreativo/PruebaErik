<template>
    <div>
        <!--<h2>Welcome home</h2>
        <button @click="counter++">Click me {{ counter }}</button>-->
        <users-table></users-table>
    </div>
</template>

<script>
import UsersTable from './UsersTable.vue'
    export default {
        components: { 
            UsersTable 
        },
        data: () => ({
            counter: 0 
        })
    }
</script>

<style>

</style>

<!--<template>
  <div id="app">
    <img src="./assets/logo.png">
    <div class="ui container">
      <my-vuetable></my-vuetable>
    </div>
  </div>
</template>

<script>
import MyVuetable from './MyVuetable'

export default {
  name: 'app',
  components: {
    MyVuetable
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>-->