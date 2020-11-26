<template>
    <div class="modal fade" id="addUser" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="moda-title" id="exampleModalLabel">Agregar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="saveUser">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Ingrese el nombre de usuario" v-model="name">
                        </div>
                        <div class="form-group">
                            <label>Lastname</label>
                            <input type="text" class="form-control" placeholder="Ingrese el apellido de usuario" v-model="lastname">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<style>

</style>

<script>
import axios from 'axios'
import EventBus from './event-bus'

export default {
    data() {
        return {
            name: null,
            lastname: null,
            form: null,
        }
    },
    methods: {
        saveUser: function() {
            /*axios.post('http://127.0.0.1:8000/user/create',{
                name: 'Hola',
                lastname: 'Como estas'
            })
            .then(function(res){
                console.log(res)
                $('addUser').modal('hide')
            })
            .catch(function(err){
                console.log(err)
            })*/

            console.log(this.name)
            console.log(this.lastname)

            this.form = {
                "name": this.name,
                "lastname" : this.lastname
            } 

            //var bodyFormData = new FormData()

            /*bodyFormData.append('name', this.name)
            bodyFormData.append('lastname', this.lastname)*/

            axios({
                method: 'post',
                url: 'http://127.0.0.1:8000/user/create',
                data: this.form,
                })
                .then(function (response) {
                    //handle success
                    console.log(response.data.user.name);
                    $('#addUser').modal('hide')
                    EventBus.$emit('user-added', response.data.user)
                })
                .catch(function (response) {
                    //handle error
                    console.log(response);
            });
        } 
    }
}
</script>