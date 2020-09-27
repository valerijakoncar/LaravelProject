@extends("admin.admin_template")
@section("title")
    Activity
@endsection
@section("mainContent")
    <div id="activity">
        <h1>User Activity</h1>
        <div id="activityListHolder">
            <select id="activityList" name="activityList">
                <option value="DESC">Newest</option>
                <option value="ASC">Oldest</option>
            </select>
        </div>
        <div id="userActivity">
            <div id="userActivityAbs">
                <table id="activityTable">
                    <tr><th>Activity</th><th>Date</th></tr>
                    @foreach($activities as $a)
                        <tr>
                            <td>{{ $a->text }}</td>
                            <td>{{ $a->date }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>
@endsection
