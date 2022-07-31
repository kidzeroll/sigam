<table cellpadding="10">

    <tr>
        <td>Nama</td>
        <td>: {{ $model->name }}</td>
    </tr>

    <tr>
        <td>Email</td>
        <td>: {{ $model->email }}</td>
    </tr>

    <tr>
        <td>Jenis Kelamin</td>
        <td>: {{ $model->gender }}</td>
    </tr>

    <tr>
        <td>Role</td>
        <td>:
            <span class="badge badge-{{ $model->role == 'admin' ? 'primary' : 'warning' }}">{{ $model->role }}</span>
        </td>
    </tr>

    <tr>
        <td>Tanggal Lahir</td>
        <td>: {{ $model->birth_date?->format('d M Y') ?? '-' }}</td>
    </tr>

    <tr>
        <td>No HP</td>
        <td>:
            @if ($model->phone)
                {{ $model->phone }}
            @else
                -
            @endif
        </td>
    </tr>

    <tr>
        <td>Alamat</td>
        <td>:
            @if ($model->address)
                {{ $model->address }}
            @else
                -
            @endif
        </td>
    </tr>

    <tr>
        <td>About</td>
        <td>:
            @if ($model->about)
                {{ $model->about }}
            @else
                -
            @endif
        </td>
    </tr>

    <tr>
        <td>Foto</td>
        <td>:
            @if ($model->photo_path)
                <img src="{{ asset('storage/' . $model->photo_path) }}" width="90px" height="90px">
            @else
                -
            @endif
        </td>
    </tr>

</table>
