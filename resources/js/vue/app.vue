<template>
    <div class="container text-white">
        <div class="row">
            <div class="col-md-3">
                <add-employee />
                <view-employee 
                    :employees="employees"
                />
            </div>
            <div class="col-md-5">
                <add-to-do 
                    :employees="employees"
                />
                <in-progress 
                    :inProgress="inProgress" 
                />
                <view-to-do 
                    :todos="todos" 
                />
            </div>
            <div class="col-md-4">
                <done 
                    :doneToDo="doneToDo" 
                />
            </div>
        </div>
    </div>
</template>

<script>

import AddEmployee from './addEmployee';
import ViewEmployee from './viewEmployee';
import AddToDo from './addToDo';
import ViewToDo from './viewToDo';
import InProgress from './inProgress';
import Done from './done';

export default {
    components:{
        AddEmployee,
        ViewEmployee,
        AddToDo,
        InProgress,
        ViewToDo,
        Done
    },
    data: function(){
        return{
            todos: [],
            employees: [],
            doneToDo: [],
            inProgress: []
        }
    },
    methods: {
        getToDoList(){
            axios.get('api/todo-list')
                .then(response => {
                    this.todos = response.data;
                })
                .catch(error => {
                    alert('Message : ' + error.message);
                })
        },
        getToDoInProgress(){
            axios.get('api/todo-list/in-progress')
                .then(response => {
                    this.inProgress = response.data;
                })
                .catch(error => {
                    alert('Message : ' + error.message);
                })
        },
        getDoneToDos(){
            axios.get('api/todo-list/done')
                .then(response => {
                    this.doneToDo = response.data;
                })
                .catch(error => {
                    alert('Message : ' + error.message);
                })
        },
        getEmployees(){
            axios.get('api/employees')
                .then(response => {
                    this.employees = response.data;
                })
                .catch(error => {
                    alert('Message : ' + error.message);
                })
        }
    },
    created(){
        this.getToDoList();
        this.getDoneToDos();
        this.getToDoInProgress();
        this.getEmployees()
    },
    // mounted() {
    //     this.getToDoList();
    //     this.getDoneToDos();
    //     this.getToDoInProgress();
    // },
}
</script>