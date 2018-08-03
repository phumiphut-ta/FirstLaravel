new Vue({
    el: '#vueApp',
    data(){
        return {
            counter:1,
            customers: [],
            gender: 'M',
            search : ''
        }
    },
    mounted(){
        // ทำงานหลังจากเรียก App.js
        this.getCustomer()
    },
    methods:{
       
        incrementCounter()
        {
            this.counter++
        },
        getCustomer(){
            axios.get('http://localhost:8000/api/customer')
            .then((res)=>{
                this.customers = res.data
            })
            console.log('OK')
        }
    },
    computed:{
        isOdd(){
            return this.counter % 2;
        },
        filterCustomers()
        {
            const resultCustomers = this.customers.filter((c)=>{
                const chosen = c.gender == this.gender
                return chosen
            })
            return resultCustomers;
        },
        searchCustomer()
        {
            const pattern = new RegExp(this.search,'i')

            return this.customers
            .filter((c)=>{
                return pattern.test(c.first_name + c.last_name);
            })
            .filter((c)=>{
                const chosen = c.gender == this.gender
                return chosen
            })
        }
    }
})