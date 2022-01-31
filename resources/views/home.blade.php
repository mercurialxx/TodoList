<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>    
<body class=bg-info>
    <div class="container w-25 mt-5 >
            <div class="card-body">
                <h3>To-do list</h3>
                <form action="{{ route('store') }}" method="POST" autocomplete="off">
                    @csrf 
                    <div class="input-group">
                        <input type="text" name="content" class="form-control" placeholder="Add new todo">
                        <button type="submit" class="btn btn-primary">&#10010;</button>
                    </div>
                </form>
                {{-- if task count --}}
                @if (count($todolists))
                <ul class="list-group list-group-flush mt-3"><br>
                    @foreach ($todolists as $todolist)
                        <li class="list-group-item">
                            <form action="{{ route('destroy', $todolist->id) }}" method="POST">
                                {{ $todolist->content }}
                                @csrf 
                                @method('delete')
                                <button type="submit" class="btn btn-warning btn-sm float-end">&#10004;</button>                            
                            </form> 
                        </li>
                    @endforeach
                </ul>    
                @endif    
            </div>
    </div>
    
</body>










</html>