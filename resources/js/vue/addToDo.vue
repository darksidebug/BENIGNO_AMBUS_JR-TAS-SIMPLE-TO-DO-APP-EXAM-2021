<template>
    <div>
        <div class="card text-white shadow mt-4 p-3">
            ToDo's
            <div>
                <input 
                    type="text" 
                    class="form-control py-2 mt-3 me-1" 
                    placeholder="Enter todo" 
                    v-model="todo.task"
                />
                <div class="pt-3">Assign to:</div>
                <select class="form-select py-2 mt-1" v-model="todo.emp_id">
                    <option class="py-2" v-for="(employee, index) in employees" :key="index" :value="employee.id">{{ employee.employee_name }}</option>
                </select>
                <button 
                    class="btn btnPrimary mt-3"
                    @click="saveToDo()"
                >Add</button>
            </div>
        </div>
    </div>
</template>
<script>

export default {
    props: ['employees'],
    data: function(){
        return{
            todo:{
                task: '',
                emp_id: ''
            }
        }
    },
    methods: {
        saveToDo(){
            if(this.todo.task == '' || this.todo.emp_id == ''){
                alert(`Fields todo's and assign fields are required!`)
                return;
            }

            axios.post('api/todo/store', {
                todo: this.todo
            })
            .then(response => {
                if(response.status === 201)
                {
                    this.todo.task = '';
                    this.todo.description = '';

                    this.$parent.getToDoList();
                }
            })
            .catch(error => {
                alert('Message : ' + error.message);
            })
        }
    },
}
</script>