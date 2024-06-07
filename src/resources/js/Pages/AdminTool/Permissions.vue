<script>

    import TheTable from "../../Components/TheTable.vue";
    export default {
        components: {TheTable},
        props: {
            roles: Object,
            all_permissions: Object,
        }
    }
</script>

<template>
    <table class="w-full text-sm text-left">
        <thead class="text-xs bg-purple">
            <tr>
                <th class="py-2 pl-[8px]">
                    Nazwa uprawnienia
                </th>
                <th class="py-2 pl-[8px]" v-for="role in roles" :v-key="role.id">
                    {{ role.name }}
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="permission in all_permissions" :v-key="permission.id">
                <td class="py-2 pl-[8px]">
                   {{ permission.name }}
                </td>
                <td class="py-2 pl-[8px]" v-for="role in roles" :v-key="role.id">
                    <input type="checkbox" :checked="role.permissions.some(perm => perm.name === permission.name)">
                </td>
            </tr>
        </tbody>
    </table>
</template>

<style scoped>
tbody tr:nth-child(2n) {
    background: #ddd;
}

tbody tr:nth-child(2n+1) {
    background: #ccc;
}
</style>
