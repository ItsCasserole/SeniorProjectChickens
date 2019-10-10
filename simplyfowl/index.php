<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP| MySQL | Vue.js | Axios Example</title>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

</head>
<body>
<h1>Flock Manager</h1>
<div id='vueapp'>

<table border='1' width='100%' style='border-collapse: collapse;'>
   <tr>
     <th>Farm Name</th>
     <th>Address</th>
     <th>City</th>
     <th>Building</th>
     
   
   </tr>

   <tr v-for='farm in Farm'>
     <td>{{ farm.farm_name }}</td>
     <td>{{ farm.farm_address }}</td>
     <td>{{ farm.farm_city }}</td>
     <td>{{ farm.farm_bldg }}</td>
   </tr>
 </table>
 </br>

    <form>
      <label>Farm Name</label>
      <input type="text" name="farm_name" v-model="farm_name">
</br>
      <label>Address</label>
      <input type="text" name="farm_address" v-model="farm_address">
      </br>
      <label>City</label>
      <input type="text" name="farm_city" v-model="farm_city">
      </br>
      <label>Farm Building</label>
      <input type="text" name="farm_bldg" v-model="farm_bldg">
      </br>
      <input type="button" @click="createFarm()" value="Add">
    </form>

</div>
<script>
var app = new Vue({
  el: '#vueapp',
  data: {
      farm_name: '',
      farm_address: '',
      farm_city: '',
      farm_bldg: '',
      Farm: []
  },
  mounted: function () {
    console.log('Hello from Vue!')
    this.getFarms()
  },

  methods: {
    getFarms: function(){
        axios.get('api/farms.php')
         .then(function (response) {
             console.log(response.data);
             app.Farm = response.data;

         })
         .catch(function (error) {
             console.log(error);
         });
    },
    createFarm: function(){
        console.log("Create farm!")

        let formData = new FormData();
        console.log("name:", this.farm_name)
        formData.append('farm_name', this.farm_name)
        formData.append('farm_address', this.farm_address)
        formData.append('farm_city', this.farm_city)
        formData.append('farm_bldg', this.farm_bldg)
        

        var farm = {};
        formData.forEach(function(value, key){
            farm[key] = value;
        });

        axios({
            method: 'post',
            url: 'api/farms.php',
            data: formData,
            config: { headers: {'Content-Type': 'multipart/form-data' }}
        })
        .then(function (response) {
            //handle success
            console.log(response)
            app.Farm.push(farm)
            app.resetForm();
        })
        .catch(function (response) {
            //handle error
            console.log(response)
        });
    }
    },
    resetForm: function(){
        this.farm_name = '';
        this.farm_address = '';
        this.farm_city = '';
        this.farm_bldg = '';
        
    }
  }
})    
</script>
</body>
</html>