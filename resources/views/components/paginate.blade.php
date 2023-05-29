<div class="container mx-auto my-8 flex justify-center">
    <section>
        <form class="flex gap-2" id="paginate-form">
            <button class="btn-primary" id="prev-paginate" @disabled($cur == 1) onclick="pageHandler(-1)"><</button>
            @foreach (range(1, $max) as $i)
                <input 
                    type="submit" 
                    class="btn-primary 
                        @if ($cur != $i)
                            bg-transparent text-primary-500
                        @endif" 
                    value="{{$i}}" 
                    name="page"/>    
            @endforeach
            <button class="btn-primary" id="next-paginate" @disabled($cur == $max) onclick="pageHandler(1)">></button>
        </form>
    </section>
</div>

<script>
    let cur = @json($cur);
    let prevBtn = document.getElementById("prev-paginate");
    let nextBtn = document.getElementById("next-paginate");
    let input = document.createElement('input');
    let form = document.getElementById("paginate-form");

    let pageHandler = (i) =>{
        input.setAttribute("name", "page");
        input.setAttribute("value", cur+i);
        input.setAttribute("hidden", true);
        form.appendChild(input);
        form.submit();
    }
</script>