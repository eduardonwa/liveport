<div class="col-start-3 row-start-2">
    <div class="flex items-center justify-center md:justify-end h-24 
                md:border-none border-2 border-gray-400">
        <div class="flex items-center space-x-6 
                    md:border-2 md:border-t-0 md:border-r-0 md:rounded-bl-md border-gray-400 p-6 h-full">
            <div>
                <a href="/projects/{{ $project->id }}/edit">
                    <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        class="h-5 w-5 hover:text-green-400 transition ease-in -mt-1" 
                        viewBox="0 0 20 20" 
                        fill="currentColor"
                    >
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div> <!-- edit end -->
            <div>
                <form 
                    action="{{ route('projects.destroy', ['project' => $project ]) }}"
                    method="POST"
                >
                    @csrf
                    @method('DELETE')
                        <button
                            type="submit"
                            onclick="return confirm('Are you sure you want to delete this?')"   
                        >
                            <svg 
                                xmlns="http://www.w3.org/2000/svg" 
                                class="h-5 w-5 hover:text-red-400 transition ease-in" 
                                viewBox="0 0 20 20" 
                                fill="currentColor"
                            >
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </button>
                </form>
            </div> <!-- delete end -->
        </div>
    </div> <!-- wrapper end -->
</div> <!-- 1st bottom container end -->

