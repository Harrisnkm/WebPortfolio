<template>
    <div class="ProceduresTable">
        <v-simple-table>
            <tr>
                <th>HCPCS</th>
                <th>Service Name</th>
                <th>Procedures Performed</th>
                <th>On Number of Patients</th>
            </tr>
            <tr v-for="procedure in procedures">
                <td>{{procedure.hcpcs_code}}</td>
                <td>{{procedure.hcpcs_description}}</td>
                <td>{{procedure.line_srvc_cnt}}</td>
                <td>{{procedure.bene_cnt}}</td>
            </tr>
        </v-simple-table>

    </div>
</template>

<script>
    export default {
        name: "ProviderSearchProviderProfileProcedures",
        props: {
            procedures: Array
        }
    }
</script>

<style scoped>

</style>
