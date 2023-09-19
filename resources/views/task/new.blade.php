<form action="/api/tasks" method="post">
    {{ csrf_field() }}
    <input type="text" name="title" placeholder="Title">
    <input type="text" name="description" placeholder="Description">
    <select name="user_id" placeholder="User_ID">
        @foreach ($users as $user) <!-- $users változót használd, ha a felhasználókat szeretnéd megjeleníteni -->
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
    <input type="date" name="end_date" placeholder="End_Date">
    <select name="status" placeholder="Status">
        <option value="1">Open</option>
        <option value="0">Close</option>
    </select>
    <input type="submit" value="OK">
</form>
