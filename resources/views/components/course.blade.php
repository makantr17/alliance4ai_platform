<tr>
    <td>{{ $course-> titre}}</td>
    <td>{{ $course-> description}}</td>
    <td>{{ $course-> created_at->diffForHumans() }}</td>
    <td>
        <form novalidate action="">
            <button class="btn btn-primary" type="submit" >Edit</button>
        </form>
    </td>
</tr>

