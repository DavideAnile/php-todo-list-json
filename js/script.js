const {createApp} = Vue;

createApp({
    data(){
        return{
            
            todos : [],

            newTodo : {

                name : '',
                status : 'undone',
            }

        }
    },

    methods: {

        getTodos(){
            axios.get('./server.php').then(response =>{
                
                this.todos = response.data
                
            })
        },

        addTodo(){

            let data = this.newTodo
                
            
            
            axios.post('./server.php', data, {headers: {'Content-Type' : 'multipart/form-data'}}).then(response => {

                this.getTodos();

                this.newTodo.name = ''
            })

            
        },

    },

    mounted(){
        this.getTodos();
    }

}).mount('#app')