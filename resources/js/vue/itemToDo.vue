<template >
    <div>
        <div class="d-flex justify-content-between align-items-center todo-list p-2">
            <div class="d-flex justify-content-start align-items-center">
                <input 
                    type="checkbox" 
                    @change="updateStatus()"
                />
                <span class="ms-3">{{todo.tasks}} - ( {{todo.employee_name}} )</span>
            </div>
            <div>
                <div class="text-danger times" @click="deleteToDo()">&times</div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['todo'],
    data: function(){
        return{
            item:{
                id: '',
            }
        }
    },
    methods: {
        updateStatus(){
            axios.post('api/todo/status/' + this.todo.task_id, {
                todo: this.todo
            })
            .then(response => {
                if(response.status === 200)
                {
                    this.$parent.$parent.getToDoList();
                    this.$parent.$parent.getToDoInProgress();
                }
            })
            .catch(error => {
                alert('Message : ' + error.message);
            })
        },
        deleteToDo(){
            axios.post('api/todo/' + this.todo.task_id, {
                todo: this.todo
            })
            .then(response => {
                if(response.status === 200)
                {
                    this.$parent.$parent.getToDoList();
                }
            })
            .catch(error => {
                alert('Message : ' + error.message);
            })
        }
    },
}
</script>