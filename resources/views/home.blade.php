@extends('master')

@section('content')
<div class="title">
        <h3>Home</h3>

        @verbatim    
        
        <div id="vueApp">
           
            <!--<h3 class="title">{{counter}}</h3>
            
            <h3 class="help is-danger" v-if="isOdd">{{counter}}</h3>
            <h3 class="help is-success" v-if ="!isOdd">{{counter}}</h3>-->

            <p class="control">
                <button @click="getCustomer()" class="button">Click Me</button>
            </p>

            <hr>
            <input type="radio" name="gender" value="M" v-model="gender">Male
            <input type="radio" name="gender" value="F" v-model="gender">Female

            <p class="control">
                <input type="text" class="input" v-model="search">
            </p>
            <hr>
            <table class="table">
                <tr v-for="c in searchCustomer">
                    <td>{{c.first_name}}</td>
                    <td>{{c.last_name}}</td>
                    <td v-if="c.gender == 'M'">Male</td>
                    <td v-else>Female</td>
                </tr>
            </table>
        </div>
        @endverbatim
</div>

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
    <script src="/app.js"></script>
@endsection