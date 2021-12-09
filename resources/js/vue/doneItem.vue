<template >
    <div class="d-flex justify-content-between align-items-center done py-2 px-1 my-0">
        <div class="d-flex justify-content-start align-items-center">
            <span class="ms-3">{{done.todo_name}} - ( {{done.employee_name}} )</span>
        </div>
        <div>
            &nbsp;
        </div>
    </div>
</template>
<script>
export default {
    props: ['done']
}
</script>