<template>
  <div class="container">
        <h3 class="p-3 text-center">All client</h3>
        <table class="table table-striped table-bordered" :per-page="perPage">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Nationality</th>
                    <th>Education</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="clients in client" :key="clients.id">
                    <td>{{ clients[1]}}</td>
                    <td>{{ clients[2]}}</td>
                    <td>{{ clients[3]}}</td>
                    <td>{{ clients[4]}}</td>
                    <td>{{ clients[5]}}</td>
                    <td>{{ clients[6]}}</td>
                    <td>{{ clients[7]}}</td>
                   
                </tr>
            </tbody>
        </table>
        <b-pagination
      v-model="currentPage"
      :total-rows="rows"
      :per-page="perPage"
      aria-controls="my-table"
    ></b-pagination>
    </div>    


</template>

<script>
import DateService from "../services/DataServices";
export default {
    name: "Client", 
    data() {
        
      return {
        perPage: 5,
        
        fields: ['Name', 'Email', 'Phone','DOB','Gender','Nationality','Education'],
        client:[],
        
      }
    },

    mounted () {
        DateService.getClient()
        .then(response=> {
            this.client = response.data
            console.log(response.data)
        })
        

    },
    computed: {
        rows() {
             return this.client.length
        }
    }
}


</script>

<style>

</style>