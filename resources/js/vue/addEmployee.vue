<template>
    <div>
        <div class="card text-white shadow-sm mt-4 p-3">
            Add Employee
            <div class="d-flex justify-content-center align-items-center">
                <input 
                    type="text" 
                    class="form-control py-2 mt-3 me-1" 
                    placeholder="Enter employee name"
                    v-model="employee.name"
                />
                <button 
                    class="btn btnPrimary mt-3"
                    @click="saveEmployee()"
                >Add</button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data: function(){
        return{
            employee:{
                name: '',
            }
        }
    },
    methods: {
        saveEmployee(){
            if(this.employee.name == ''){
                return;
            }

            axios.post('api/employees/store', {
                employee: this.employee
            })
            .then(response => {
                if(response.status === 201)
                {
                    this.employee.name = '';

                    this.$parent.getEmployees();
                }
            })
            .catch(error => {
                alert('Message : ' + error.message);
            })
        }
    },
}
</script>