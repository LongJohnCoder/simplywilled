import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { NyPoaComponent } from './ny-poa.component';

describe('NyPoaComponent', () => {
  let component: NyPoaComponent;
  let fixture: ComponentFixture<NyPoaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ NyPoaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NyPoaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
