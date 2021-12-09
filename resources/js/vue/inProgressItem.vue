<template >
    <div>
        <div class="d-flex justify-content-between align-items-center in-progress p-2">
            <span>{{inProgressItem.tasks}} - ( {{inProgressItem.employee_name}} )</span>
            <div>
                <div class="mark-as-done" @click="updateStatus()">Mark as done</div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['inProgressItem'],
    methods: {
        updateStatus(){

            axios.post('api/todo/update/' + this.inProgressItem.task_id, {
                todo: this.inProgressItem
            })
            .then(response => {
                if(response.status === 200)
                {
                    this.$parent.$parent.getToDoInProgress();
                    this.$parent.$parent.getDoneToDos();
                }
            })
            .catch(error => {
                alert('Message : ' + error.message);
            })
        }
    },
}
</script>