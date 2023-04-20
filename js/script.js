const {createApp} = Vue;

createApp({
    data(){
        return{
            
            todos : [],

            newTodo : {

                name : '',
                status : false,
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

            if(this.newTodo.name == ''){

            } else {

                let data = this.newTodo
                    
                
                
                axios.post('./server.php', data, {headers: {'Content-Type' : 'multipart/form-data'}}).then(response => {
    
                    this.getTodos();
    
                    this.newTodo.name = ''
                })

            }


        },

        toggleStatus(i){

            this.todos[i].status = !this.todos[i].status
        },

        
            

    },

    mounted(){
        this.getTodos();
    }

}).mount('#app')