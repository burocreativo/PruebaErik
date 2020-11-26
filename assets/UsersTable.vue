<template>
    <div>
        <load-spinner v-show="loading"></load-spinner>
        <add-user-button></add-user-button>
        <table class="table table-striped">
          <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Lastname</th>
                  <th scope="col">Registration Date</th>
                  <th scope="col">Days Passed</th>
                </tr>
          </thead>
          <tbody>
                <tr v-for="user in data.users">
                  <th scope="row">{{ user.id }}</th>
                  <td>{{ user.name }}</td>
                  <td>{{ user.lastname }}</td>
                  <td>{{ user.createdAt }}</td>
                  <td>{{ user.daysPassed }}</td>
                </tr>
                <!--<tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Larry</td>
                  <td>the Bird</td>
                  <td>@twitter</td>
                </tr>-->
          </tbody>
        </table>
        <create-user-modal></create-user-modal>
    </div>
</template>

<script>
    import axios from 'axios'
    import LoadSpinner from './LoadSpinner.vue'
    import AddUserButton from './AddUserButton.vue'
    import CreateUserModal from './CreateUserModal.vue'
    import EventBus from './event-bus'

    export default {
        components: { LoadSpinner, AddUserButton, CreateUserModal },
        data () {
            return{
                counter: 0,
                /*data: 
                {
                    "error":false,
                    "users":
                    [
                        {"id":1,"name":"Erik Orlando","lastname":"Torres G\u00f3mez","daysPassed":"1"},
                        {"id":2,"name":"Erik Orlando","lastname":"Torres G\u00f3mez","daysPassed":"1"},
                        {"id":3,"name":"Erik Orlando","lastname":"Torres G\u00f3mez","daysPassed":"1"}
                    ]
                }*/
                data: [],
                loading: true
            }
        },
        created(){
            EventBus.$on('user-added', data => {
                this.data.users.push(data)
            })
        },
        mounted () {
            axios
                .get('http://127.0.0.1:8000/user')
                .then((res) => {
                   this.data = res.data
                   this.loading = false;
                })
        }
    }
</script>

<style>

</style>