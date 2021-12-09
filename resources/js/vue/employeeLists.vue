<template>
    <div class="d-flex justify-content-start align-items-center py-2 employee">
        <div class="img-wrapper me-3">
        </div>
        <span>{{ employee.employee_name }}</span>
    </div>
</template>
<script>
export default {
    props: ['employee']
}
</script>