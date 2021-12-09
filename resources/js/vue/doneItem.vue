<template >
    <div class="d-flex justify-content-between align-items-center done py-2 px-1 my-0">
        <div class="d-flex justify-content-start align-items-center">
            <span class="ms-1">{{done.tasks}} - ( {{done.employee_name}} )</span>
        </div>
        <div>
            <div class="mark-done">&#10004;</div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['done']
}
</script>