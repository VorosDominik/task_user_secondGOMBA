<form action="/api/tasks/{{$task->id}}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="title" placeholder="Title" value="{{ $task->title }}">
    <input type="text" name="description" placeholder="Description" value="{{ $task->description }}">
    <select name="user_id" placeholder="User_ID">
        @foreach ($users as $user)
            <option value="{{ $user->id }}" {{ $user->id == $task->user_id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
        @endforeach
    </select>
    <input type="date" name="end_date" placeholder="End_Date" value="{{ $task->end_date }}">
    <select name="status" placeholder="Status">
        <option value="1" {{ $task->status == 1 ? 'selected' : '' }}>Open</option>
        <option value="0" {{ $task->status == 0 ? 'selected' : '' }}>Close</option>
    </select>
    <input type="submit" value="OK">
</form>
