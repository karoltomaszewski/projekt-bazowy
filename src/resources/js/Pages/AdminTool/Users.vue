<script>

    import TheTable from "../../Components/TheTable.vue";
    export default {
        components: {TheTable},
        props: {
            users: Object,
        },
        data() {
            return {
                tableFields: [
                    'ID',
                    'Email',
                    'Uprawnienia',
                    'Data rejestracji',
                ],
            }
        },
        computed: {
            tableData() {
                return this.users.map(user => {
                    return {
                        'id': {
                            value: user.id,
                            destination: route('admin.users.show', [user.id])
                        },
                        'email': user.email,
                        'role_name': user.role.name,
                        'created_at': this.$formatDate(user.created_at),
                    }
                });
            }
        }
    }
</script>

<template>
    <div>
        <TheTable
            :fields="tableFields"
            :data="tableData"
        />
    </div>
</template>
