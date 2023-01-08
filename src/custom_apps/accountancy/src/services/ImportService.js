import axios from '@nextcloud/axios'
import { generateUrl } from '@nextcloud/router'

function url(url) {
    url = `/apps/accountancy/api/v1${url}`
    return generateUrl(url)
}

export default {
    sendFile: function(file) {
        var formData = new FormData();
        formData.append("import", file);
        axios.post(url('/import'), formData, {
            headers: {
              'Content-Type': 'multipart/form-data'
            }
        }).then(response => {
            console.log(response.data);
        })
    }
};