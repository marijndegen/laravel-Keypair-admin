async function deleteEntity(url, id) {
    const response = await fetch(location.protocol + '//' + location.host + url + id, {
        method: 'delete',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        }
    });

    if (response.status === 200) {
        location.reload();
    } else if (response.status === 404) {
        const json = await response.json();
        alert(json.error);
    }
}

function confirmDelete(id, description, type) {
    if (confirm('Are you sure you want to delete ' + description + '?')) {
        if (type === 'keyPair') {
            deleteEntity('/rsa/key_pair/delete/', id);
        }

        if (type === 'contact') {
            deleteEntity('/contact/delete/', id);
        }

    }
}