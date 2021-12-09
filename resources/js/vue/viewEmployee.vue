<template>
    <div>
        <div class="card text-white shadow mt-4 p-3">
            <span class="textPrimary mb-2 pb-1">Employee List</span>
            
            <p v-if="!employees.length" class="text-muted text-center mt-2 pb-0">No employee has been done yet.</p>
            <div v-for="(employee, index) in employees" :key="index" class="mt-0">
                <employee-lists 
                    :employee="employee"
                    class="mb-0"
                />
            </div>
        </div>
    </div>
</template>
<script>

import EmployeeLists from './employeeLists';

export default {
    props: ['employees'],
    components: {
        EmployeeLists
    }
}
</script>